

var banners = ["img/destaque-home.png", "img/destaque-home-2.png"];
var bannerAtual = 0;

/** Validar Busca **/

function validaBusca() {
	if (document.querySelector('#q').value == '') {
		//alert('Não podia ter deixado em branco a busca!');
		//document.querySelector('#form-busca').style.background = 'red';
		return false;
	}
}

function trocaBanner() {
	bannerAtual = (bannerAtual + 1) % 2;
	document.querySelector('.destaque img').src = banners[bannerAtual];
}