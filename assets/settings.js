let acft_license_code_settings = "";
async function acft_check() {
	if (acft_license_code_settings != "") {
		
		const response = await fetch("https://api.skelpo.com/v1/licenses/check/"+acft_license_code_settings, {
			method: 'GET',
		  });
		return response.json();
	}
	else {
		return false;
	}
	
}
async function acft_sign_up() {
	if (acft_license_code_settings != '') {
		return await acft_check();
		
	}
	else {
		const response = await fetch("https://api.skelpo.com/v1/licenses/signup", {
			method: 'POST',
			headers: {
			  'Content-Type': 'application/json',
			},
			body: JSON.stringify({"product": "ACFTranslate"}),
		  });
		return response.json();
	}
	
}
let settingState;
async function init() {
	if (settingState == undefined) {
		let c = await acft_check();
		if (c == false) {
			let c = await acft_sign_up();
			acft_license_code_settings = c.licenseKey;
			c = await acft_check();
			document.querySelector("input[name='carbon_fields_compact_input[_acft_license]']").value = acft_license_code_settings;
			document.getElementById('theme-options-form').submit();
		}
		settingState = c;
	}
	let field = document.querySelector(".acft_default_language");
	
	let newElement = document.createElement("div");
	let extra = `Characters used: ${settingState.usedTokens}<br />Characters available: ${settingState.includedTokens}<br />You are using the <strong>free</strong> version. You can use up until ${settingState.includedTokens} characters with your translations. Beyond that you will need to pay ${settingState.upgradePrice} <strong>once</strong> for the plugin. The limit will disappear then.<br /><br /><a href="https://api.skelpo.com/v1/licenses/buy/acftranslate/${acft_license_code_settings}" target="_blank">Buy license</a>`;
	if (settingState.plan == "paid") {
		extra = `You paid for the plugin and can use it as much as you like. 😇 <br /><br /><strong>Paid Tokens</strong><br /><i>You can use our integrated translation method if you want.</i><br />Paid tokens available: ${settingState.includedTokens}<br />Paid tokens used: ${settingState.usedTokens}<br /><a href="https://api.skelpo.com/v1/licenses/buy/acft-topup/${acft_license_code_settings}" target="_blank">Top-Up</a>`;
	}
	console.log("settings: ", settingState);
	newElement.innerHTML = `<div class="cf-field cf-text usage"><div class="cf-field__head"><label class="cf-field__label" for="cf-usage">Usage</label></div><div class="cf-field__body">${extra}</div>`;
	field.parentNode.insertBefore(newElement, field);
}
console.log("acft init bare");
document.addEventListener('DOMContentLoaded', function () {
	setTimeout(function() {
		acft_license_code_settings = document.querySelector("input[name='carbon_fields_compact_input[_acft_license]']").value;
		console.log("license: ", acft_license_code_settings);
		init();

	},1500);
}, false);
