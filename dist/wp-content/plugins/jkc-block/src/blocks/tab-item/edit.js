import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import { RichText } from "@wordpress/block-editor";
import { useEffect } from "@wordpress/element";
import "./editor.scss";

const TEMPLATE = [["jkc-block/text"]];

export default function Edit({ attributes, setAttributes, isSelected }) {
  const { label, groupName, enableContentToggle, isActiveTab } = attributes;

  useEffect(() => {
    if (!groupName || groupName === "") {
      setAttributes({
        groupName: `tab-group-${Math.random().toString(36).substr(2, 9)}`,
      });
    }
  }, [groupName, setAttributes]);

  const blockProps = useBlockProps({
    className: "c-block-tab-item",
  });

  const innerBlocksProps = useInnerBlocksProps(
    {
      className: "c-block-tab-item__content",
    },
    {
      template: TEMPLATE,
    },
  );

  return (
    <div {...blockProps}>
      <label>
        <input
          type="radio"
          name={groupName}
          checked={isActiveTab}
          onChange={() => setAttributes({ isActiveTab: true })}
        />
        <RichText
          tagName="span"
          value={label}
          onChange={(newVal) => setAttributes({ label: newVal })}
          placeholder="タブ名を入力"
        />
      </label>
      <div className="c-block-tab-item__content-wrapper">
        <div {...innerBlocksProps} />
        {enableContentToggle && (
          <div className="c-block-tab-item__toggle-btn-wrapper">
            <button
              className="c-block-tab-item__toggle-btn"
              aria-expanded="true"
            >
              閉じる
            </button>
          </div>
        )}
      </div>
    </div>
  );
}
