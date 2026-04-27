import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function save({ attributes }) {
  const { markerStyle1, markerStyle2, markerStyle3, markerStyle4, markerStyle5 } = attributes;
  const blockProps = useBlockProps.save();
  const innerBlocksProps = useInnerBlocksProps.save({
    className: "c-block-list-ordered-marker__items",
  });

  return (
    <div {...blockProps}>
      <div
        className="c-block-list-ordered-marker"
        data-marker-1={markerStyle1}
        data-marker-2={markerStyle2}
        data-marker-3={markerStyle3}
        data-marker-4={markerStyle4}
        data-marker-5={markerStyle5}
      >
        <ol {...innerBlocksProps} />
      </div>
    </div>
  );
}
