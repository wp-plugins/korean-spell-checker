(function() {
	tinymce.create('tinymce.plugins.koreanSpellChecker', {
		init : function(ed, url) {
			ed.addCommand('open_korean_spell_checker', function() {
				window.open('http://speller.cs.pusan.ac.kr/','_blank');
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
})();
