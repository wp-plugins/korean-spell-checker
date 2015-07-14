jQuery( document ).ready( function ($) {
	tinymce.create('tinymce.plugins.koreanSpellChecker', {
		init : function(ed, url) {
			ed.addCommand('open_korean_spell_checker', function( e ) {
				var text = ed.getContent({ format : 'text' });
				$( '<form/>', {
					'id':'KSC_form',
					'target':'_blank',
					'action':'http://speller.cs.pusan.ac.kr/PnuSpellerISAPI_201504/lib/check.asp',
					'method':'post',
					'html':'<textarea name="text1"></textarea>',
				}).appendTo('body');
				$( 'form#KSC_form textarea' ).html( text );
				$( 'form#KSC_form' ).submit();
				$( 'form#KSC_form' ).remove();
			});

			// Register buttons
			ed.addButton('korean_spell', {
				title : '한국어 맞춤법 검사기를 열어요.',
				cmd : 'open_korean_spell_checker'
			});
		},

		getInfo : function() {
			return {
				longname : 'Korean Spell Checker',
				author : 'sujin',
				authorurl : 'http://www.sujinc.com',
				infourl : '',
				version : '1.0'
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('korean_spell', tinymce.plugins.koreanSpellChecker);
});