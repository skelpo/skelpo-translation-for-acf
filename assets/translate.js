var currentState;
async function acft_check() {
	if (acft_license_code) {
		
		const response = await fetch("https://api.skelpo.com/v1/licenses/check/"+acft_license_code, {
			method: 'GET',
		  });
		return response.json();
	}
	else {
		return false;
	}
	
}
async function acft_sign_up() {
	if (acft_license_code != '') {
		return await acft_check();
		
	}
	else {
		const response = await fetch("https://api.skelpo.com/v1/licenses/signup", {
			method: 'POST',
			headers: {
			  'Content-Type': 'application/json',
			},
			body: JSON.stringify({"product": "ACFTranslate", "url": document.location.href}),
		  });
		return response.json();
	}
	
}

async function acft_translate() {
	if (currentState == undefined) {
		let c = await acft_check();
		if (c == false) {
			let c = await acft_sign_up();
			acft_license_code = c.licenseKey;
			c = await acft_check();
		}
		currentState = c;
	}
	
	
	var elements1 = document.querySelectorAll('input[name*="acf["]');
	var elements2 = document.querySelectorAll('textarea[name*="acf["]');
	var elements3 = document.querySelectorAll('input[name*="post_"]')
	var targetElements = [];
	
	if (tinymce) {
		for (let e of tinymce.editors) {
			let id = e.getElement().getAttribute("id");
			let content = e.getContent();
			targetElements.push({
				"type": "tinymce",
				"originalContent": e.getContent(),
				"instance": e
			});
			console.log("id: ", id, e);
		}
	}
	for (let e of elements1) {
		if (e.getAttribute("type") == "text" && e.value.length>0) {
			targetElements.push({
				"type": "input",
				"originalContent": e.value,
				"instance": e
			});
		}
	}
	for (let e of elements3) {
		if (e.getAttribute("type") == "text" && e.value.length>0) {
			targetElements.push({
				"type": "input",
				"originalContent": e.value,
				"instance": e
			});
		}
	}
	for (let e of elements2) {
		targetElements.push({
			"type": "textarea",
			"originalContent": e.value,
			"instance": e
		});
	}
	let engine = "deepl";
	if (acft_engine && acft_engine != "deepl") {
		engine = acft_engine;
	}
	let sourceLanguage = document.getElementById('acft_source_lang').value;
	let targetLanguage = document.getElementById('acft_target_lang').value;
	
	let replace = true;
	if (document.querySelector('input[name="acft_replace"]').value == "append") {
		replace = false;
	}
	console.log("engine: ", engine, targetElements);
	var tokens = 0;
	for (let t of targetElements) {
		tokens = tokens + t.originalContent.length;
		
	}
	if (currentState.plan == "free") {
		if ((currentState.usedTokens+tokens)>currentState.includedTokens) {
			alert(`Limit reached - please upgrade our plugin to the paid version for ${currentState.upgradePrice}`);
			return;
		}
	}
	for (let t of targetElements) {
		let translation = t.originalContent;
		translation = await translateTextSkelpo(translation, targetLanguage, engine);
		if (t.type == "textarea") {
			if (replace) {
				t.instance.value = translation;
			}
			else {
				t.instance.value += translation;
			}
		}
		else if (t.type == "input") {
			if (replace) {
				t.instance.value = translation;
			}
			else {
				t.instance.value += translation;
			}
		}
		else if (t.type == "tinymce") {
			if (replace) {
				t.instance.setContent(translation);
			}
			else {
				t.instance.setContent(t.originalContent+translation);
			}
		}
	}
	console.log("translated");
}


async function translateTextSkelpo(text, targetLanguage, engine) {
  const apiUrl = `https://api.skelpo.com/v1/translations/translate`;
  let dd = {
	text: text,
	targetLang: targetLanguage,
	licenseKey: acft_license_code
  };
  if (engine == "deepl") {
	  dd["deeplKey"] = acft_deepl_api_key;
  }
  const response = await fetch(apiUrl, {
	method: 'POST',
	headers: {
	  'Content-Type': 'application/json',
	},
	body: JSON.stringify(dd),
  });

  if (!response.ok) {
	throw new Error(`Translation failed with status: ${response.status}`);
  }

  const data = await response.json();
  return data.translatedText;
}
async function init() {
	if (currentState == undefined) {
		let c = await acft_check();
		if (c == false) {
			let c = await acft_sign_up();
			acft_license_code = c.licenseKey;
			c = await acft_check();
		}
		currentState = c;
		var usage = "";
		let engine = "deepl";
		if (acft_engine && acft_engine != "deepl") {
			engine = acft_engine;
		}
		
		if (currentState.plan == "free") {
			if (engine == "integrated") {
				usage = `Please upgrade to use the integrated AI translations. It costs ${settingState.upgradePrice} once. <a href="https://api.skelpo.com/v1/licenses/buy/acftranslate/${acft_license_code}" target="_blank">Buy license</a>`;
			}
			else {
				if (currentState.usedTokens<currentState.includedTokens) {
					usage = `Characters used: ${currentState.usedTokens}<br />Characters available: ${currentState.includedTokens}<br />You are using the <strong>free</strong> version. You can use up until ${currentState.includedTokens} characters with your translations. Beyond that you will need to pay ${currentState.upgradePrice} <strong>once</strong> for the plugin. The limit will disappear then.<br /><br /><a href="https://api.skelpo.com/v1/licenses/buy/acftranslate/${acft_license_code}" target="_blank">Buy license</a>`;
				}
				else {
					document.getElementById('acft_translate_do').style.display = 'none';
					usage = `You are using the <strong>free</strong> version and have reached the character limit. You can upgrade for only ${currentState.upgradePrice} <strong>once</strong>.<br /><br /><a href="https://api.skelpo.com/v1/licenses/buy/acftranslate/${acft_license_code}" target="_blank">Upgrade Now</a>`;
				}
			}
		}
		else {
			if (engine == "deepl") {
				if (acft_deepl_api_key && acft_deepl_api_key.length>0) {
					
				}
				else {
					usage = `You have <strong>DeepL</strong> set up for the translations. Please provide your API key <a href="?page=crb_carbon_fields_container_acf_translate_settings.php" target="_blank">here</a>.`;
				}
			}
			else if (engine == "integrated") {
				usage = `Characters used: ${currentState.usedTokens}<br />Characters available: ${currentState.paidTokens}<br />You are using the <strong>paid</strong> version. You can use up until ${currentState.paidTokens} characters with your translations. `;
				if (currentState.paidTokens < 2000) {
					usage += `<a href="https://api.skelpo.com/v1/licenses/buy/acft-topup/${acft_license_code_settings}" target="_blank">Top-Up</a>`;
				}
			}
		}
		document.getElementById('acft_usage').innerHTML = usage;
	}	
}
document.addEventListener('DOMContentLoaded', function () {
  init();
}, false);
