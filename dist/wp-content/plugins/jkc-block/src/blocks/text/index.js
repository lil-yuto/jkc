
import { registerBlockType, registerBlockStyle } from '@wordpress/blocks';
import './style.scss';

import Edit from './edit';
import save from './save';
import metadata from './block.json';

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType( metadata.name, {
	/**
	 * @see ./edit.js
	 */
	edit: Edit,

	/**
	 * @see ./save.js
	 */
	save,
} );

// 別スタイルの定義を追加
registerBlockStyle(metadata.name, {
  name: 'border',
  label: "枠付き",
});

// 別スタイルの定義を追加
registerBlockStyle(metadata.name, {
  name: 'border-red',
  label: "枠付き (赤)",
});