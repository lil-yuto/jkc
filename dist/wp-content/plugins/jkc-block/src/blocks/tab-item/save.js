import clsx from "clsx";
import {
  RichText,
  useBlockProps,
  useInnerBlocksProps,
} from "@wordpress/block-editor";

export default function save({ attributes }) {
  const { label, checked, groupName, enableContentToggle } = attributes;
  return (
    <div
      {...useBlockProps.save({
        className: clsx("c-block-tab-item", {
          "is-toggle-disabled": !enableContentToggle,
        }),
      })}
      data-group-name={groupName}
      {...(checked && { "data-checked": "" })}
    >
      <label>
        <RichText.Content tagName="span" value={label} />
      </label>
      <div className="c-block-tab-item__content-wrapper">
        <div
          {...useInnerBlocksProps.save({
            className: "c-block-tab-item__content",
          })}
        />
        {enableContentToggle && (
          <div className="c-block-tab-item__toggle-btn-wrapper">
            <button
              className="c-block-tab-item__toggle-btn"
              aria-expanded="false"
            >
              開く
            </button>
          </div>
        )}
      </div>
    </div>
  );
}
