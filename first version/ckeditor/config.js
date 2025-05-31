/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
/*
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
};
*/

CKEDITOR.editorConfig = function( config ) {
	config.language = 'en';
	config.uiColor = '#f5f5f5';
	config.height = 300;
	config.toolbarCanCollapse = true;
	config.extraPlugins = 'imagebrowser,filebrowser';
	config.fullPage = false;
	config.extraPlugins = 'widget';
	config.extraPlugins = 'lineutils';
	config.extraPlugins = 'tableresize';
	config.allowedContent = true;
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' }
		//{ name: 'about' }
		
	];
	config.removeButtons = 'Scayt';
	//config.removeButtons = 'Source,Scayt,Table,Anchor,HorizontalRule,Indent';
	config.enterMode = CKEDITOR.ENTER_DIV;
	//config.filebrowserBrowseUrl = '/index.php?q=imce&app=ckeditor|url@txtUrl|width@txtWidth|height@txtHeight';
	//config.filebrowserImageBrowseUrl = '/index.php?q=imce&app=ckeditor|url@txtUrl|width@txtWidth|height@txtHeight';
	//config.filebrowserFlashBrowseUrl = '/index.php?q=imce&app=ckeditor|url@txtUrl|width@txtWidth|height@txtHeight';

	//config.filebrowserBrowseUrl = '/browser/';
	//config.filebrowserImageBrowseUrl = '/browser';
	//config.filebrowserFlashBrowseUrl = '/browser';
	config.filebrowserUploadUrl = '/browser/file.php';
	config.extraPlugins = 'btbutton';
	//config.contentsCss = '/Assets/css/main.css';
	config.extraPlugins = 'justify';
	config.extraPlugins = 'lineheight';




// disable auto spell check config.scayt_autoStartup = false;
};
