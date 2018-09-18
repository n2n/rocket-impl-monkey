(function () {
	Jhtml.ready(function (elements) {
		$(elements).find(".rocket-impl-monkey-jqtagedit").each(function () {
			var elemJq = $(this);
			var inputJq = elemJq.find("input,textarea");
			inputJq.tagEditor({
				onChange: upcss 
			});
			
			upcss(null, inputJq.tagEditor('getTags')[0].editor)
		});
		
		function upcss(field, editor, tags) {
			$('li', editor).each(function() {
				$(this).addClass("badge badge-secondary");
			});
		}
		
	});
})();