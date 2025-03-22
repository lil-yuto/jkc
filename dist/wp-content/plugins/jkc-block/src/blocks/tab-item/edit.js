import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import { RichText } from "@wordpress/block-editor";
import { useCallback } from "@wordpress/element";
import "./editor.scss";

const TEMPLATE = [["jkc-block/text"]];

export default function Edit({ attributes, setAttributes }) {
  const { label, checked, groupName } = attributes;

  const blockProps = useBlockProps({
    className: "c-block-tab-item",
  });

  const handleInputChange = useCallback((event) => {
    setAttributes({ checked: event.target.checked });
  }, [setAttributes]);

  const innerBlocksProps = useInnerBlocksProps(
    {
      className: "c-block-tab-item__content",
    },
    {
      template: TEMPLATE,
    }
  );

  return (
    <div {...blockProps}>
      <label>
        <input
          type="radio"
          name={groupName}
          checked={checked}
          onChange={handleInputChange}
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
        <button
          className="c-block-tab-item__toggle-btn"
          aria-expanded="true"
        >
          <span>閉じる</span>
        </button>
      </div>
    </div>
  );
}
