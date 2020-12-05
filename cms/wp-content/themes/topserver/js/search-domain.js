$(document).ready(function(){
	if(document.getElementById("checkbox") != null){
		document.getElementById("checkbox").disabled = true;
	}
}); //disabled checkbox register page END

$(document).ready(function(){
	$('#hv-domain').prop('disabled', true);
	if(document.getElementById("output_domain") != null) {
    	document.getElementById("output_domain").style.display = "contents";
	}
});

//Use AJAX to search and handle domain name system
$(document).on('click', '#btn_domain', function() {
        var search_domain = $('#search_domain').val();
		var nic = $('#nic').val();
		var tmp_dir = $('body').attr('data-tmpdir') + '/search_domain_cf7.php';
	var checkbox = $('#checkbox').val();
	if ( search_domain != "" && nic != "ドメイン") {
		$.ajax({
            		url: tmp_dir,
            		data: {
                		search_domain: search_domain,
                		nic: nic,
            		},
            		type: 'POST',
            		success: function(data) {
  				if (data == 0) {
                       			 //console.log('a');
                        		$('#output_domain').html(search_domain + nic + 'の検索結果：<color=black><b>このドメインは使われていません。取得可能です。<b>');
                        		document.getElementById("checkbox").disabled = false;
                        		//$('.send-pre').prop('disabled', false);
                    		} else {
                        		//console.log('b');
                        		$('#output_domain').html(search_domain + nic + 'の検索結果：<font color=red><strong>このドメインは使われています。他のドメインをご指定下さい。</strong>');
                        		document.getElementById("checkbox").disabled = true;
                        		$('.send-pre').prop('disabled', true);
                    		}
            		},
        	});
		
	} else {
        	$('#output_domain').html('ドメイン名を入力してください');
 	}
    });
//Use AJAX to search and handle domain name system END


//disabled checkbox and send button when change input "search-domain"
$(document).ready(function(){
    $('#search_domain').change(function() {
	document.getElementById("checkbox").disabled = true;
        $('.send-pre').prop('disabled', true);
	document.getElementById("output_domain").innerHTML = "";
    });
});

$(document).ready(function(){
    $('#nic').change(function() {
	document.getElementById("checkbox").disabled = true;
        $('.send-pre').prop('disabled', true);
	document.getElementById("output_domain").innerHTML = "";
    });
});
//disabled checkbox and send button when change input "search-domain" END


//only new-page radio
//change and handle radio input
$(document).ready(function(){
        $('.radio-a').change(function(){
            radio_first = $("input[value='新規に取得']:checked").val();
	    radio_last = $("input[value='取得済み']:checked").val();
		if( radio_first == "新規に取得"){
			$('#search_domain').prop('disabled', false);
			$('#nic').prop('disabled', false);
			$('#btn_domain').prop('disabled', false);
			document.getElementById("checkbox").disabled = true;
			$('#hv-domain').prop('disabled', true);
			document.getElementById("output_domain").innerHTML = "";
			document.getElementById("output_domain").style.display = "contents";
		}else{
			$('#search_domain').val('');
			$('#nic').val('ドメイン');
			$('#search_domain').prop('disabled', true);
			$('#nic').prop('disabled', true);
			$('#btn_domain').prop('disabled', true);
			document.getElementById("checkbox").disabled = false;
			$('#hv-domain').prop('disabled', false);
			document.getElementById("output_domain").style.display = "none";
		}
        });
    });
//only new page radio END


//Not disabled send button when the domain name is used and checked
$(document).on('click', '#btn_domain', function() {
        var search_domain = $('#search_domain').val();
		var nic = $('#nic').val();
		var tmp_dir = $('body').attr('data-tmpdir') + '/search_domain_cf7.php';
	var checkbox = $('#checkbox').val();
	$.ajax({
            	url: tmp_dir,
            	data: {
                	search_domain: search_domain,
                	nic: nic,
            	},
            	type: 'POST',
            	success: function(data) {
		if ( data == 0 && $('#checkbox').is(":checked") ) {
			$('.send-pre').prop('disabled', false);
		}
            },
        });
});
//END

$(document).ready(function(){
$("#search_domain").keyup(function(){
	document.getElementById("output_domain").innerHTML = "";
});
$("#search_domain").keydown(function(){
		document.getElementById("output_domain").innerHTML = "";
	});
});


/*ドメイン戻るからチェック*/
jQuery(document).on({
'mouseenter' : function() {

},
'mouseleave' : function(){
	if($('input[name=radio-235]:checked').val() === '新規に取得'){
		$('#hv-domain').prop("disabled", true);
	}else{
		$('#search_domain').prop("disabled", true);
	}
}
}, '.back-p');


function hankaku2Zenkaku(str) {
    return str.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
        return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
    });
}

//利用料入金完了連絡フォーム　お振込金額（全角→半角）、郵便番号入力エリア半角に
$(document).ready(function(){
	if(document.querySelector('.p-done [name="price"]') != null) {
		var donePrice = document.querySelector('.p-done [name="price"]');
		donePrice.addEventListener('change', function(num){
			donePrice.value = donePrice.value.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
				return String.fromCharCode(s.charCodeAt(0) - 65248);
			});
		});
	}
});
$(document).ready(function(){
	if(document.querySelector('[name="zipcode1"]') != null) {
		var postCode = document.querySelector('[name="zipcode1"]');
		postCode.addEventListener('change', function(num){
			postCode.value = postCode.value.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
				return String.fromCharCode(s.charCodeAt(0) - 65248);
			});
		});
	}
});
$(document).ready(function(){
	if(document.querySelector('[name="zipcode2"]') != null) {
		var postCode = document.querySelector('[name="zipcode2"]');
		postCode.addEventListener('change', function(num){
			postCode.value = postCode.value.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
				return String.fromCharCode(s.charCodeAt(0) - 65248);
			});
		});
	}
});



//プラン変更申請フォーム（カレンダーの期間を設定）
$(document).ready(function(){
	if(document.querySelector('.p-change [name="choose-date"]') != null) {
		var d = new Date();
		d.setDate(d.getDate() + 20);
		var day = d.getMonth()+1;
		if(day <= 10){
			day = '0' + day;
		}
		var today = d.getFullYear()+'-'+day+'-'+d.getDate();
		var doneDate = document.querySelector('.p-change [name="choose-date"]');
		doneDate.setAttribute('min',today);

		//20日後まで
		// var p = new Date();
		// p.setDate(p.getDate() + 21);
		// var p_day = p.getMonth()+1;
		// if(p_day <= 10){
		// 	p_day = '0' + p_day;
		// }
		// var period = p.getFullYear()+'-'+p_day+'-'+p.getDate();
		// doneDate.setAttribute('max',period);
	}
});