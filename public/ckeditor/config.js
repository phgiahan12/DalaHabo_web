/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'vi';
	config.toolbarGroups = [
		{ name: 'mode'},
        { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
        { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
        { name: 'links' },
        { name: 'insert' },
        '/',
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'styles' },
        { name: 'colors' },
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align'] },
        
    ];

    config.removePlugins = 'image';

    // Simplify the dialog windows.
    config.removeDialogTabs = 'image:advanced;link:advanced';


};
