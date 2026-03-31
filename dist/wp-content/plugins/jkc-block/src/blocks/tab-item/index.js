import { registerBlockType } from '@wordpress/blocks';
import './style.scss';
import Edit from './edit';
import save from './save';
import metadata from './block.json';
import clsx from 'clsx';
import { RichText, useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

const deprecated = [
  // 旧save(): <input type="radio"> を含むHTML
  {
    attributes: metadata.attributes,
    supports: metadata.supports,
    migrate(attributes, innerBlocks) {
      return [attributes, innerBlocks];
    },
    save({ attributes }) {
      const { label, checked, groupName, enableContentToggle } = attributes;
      return (
        <div {...useBlockProps.save({
          className: clsx("c-block-tab-item", {
            "is-toggle-disabled": !enableContentToggle
          })
        })}>
          <label>
            <input type="radio" name={groupName}
              {...(checked && { checked: true })} />
            <RichText.Content tagName="span" value={label} />
          </label>
          <div className="c-block-tab-item__content-wrapper">
            <div {...useInnerBlocksProps.save({
              className: "c-block-tab-item__content",
            })} />
            {enableContentToggle && (
              <div className="c-block-tab-item__toggle-btn-wrapper">
                <button className="c-block-tab-item__toggle-btn"
                  aria-expanded="false">開く</button>
              </div>
            )}
          </div>
        </div>
      );
    },
  },
  // 壊れた投稿: wp_ksesにより<input type="radio">が除去済み、data属性もなし
  {
    attributes: metadata.attributes,
    supports: metadata.supports,
    migrate(attributes, innerBlocks) {
      return [attributes, innerBlocks];
    },
    save({ attributes }) {
      const { label, enableContentToggle } = attributes;
      return (
        <div {...useBlockProps.save({
          className: clsx("c-block-tab-item", {
            "is-toggle-disabled": !enableContentToggle
          })
        })}>
          <label>
            <RichText.Content tagName="span" value={label} />
          </label>
          <div className="c-block-tab-item__content-wrapper">
            <div {...useInnerBlocksProps.save({
              className: "c-block-tab-item__content",
            })} />
            {enableContentToggle && (
              <div className="c-block-tab-item__toggle-btn-wrapper">
                <button className="c-block-tab-item__toggle-btn"
                  aria-expanded="false">開く</button>
              </div>
            )}
          </div>
        </div>
      );
    },
  },
];

registerBlockType( metadata.name, {
  edit: Edit,
  save,
  deprecated,
} );
