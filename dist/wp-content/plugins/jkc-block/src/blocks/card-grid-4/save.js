import clsx from "clsx";
import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function save({ attributes }) {
  const { cardCount } = attributes;
  
  const className = clsx({
    "c-card-grid": true,
    [`c-card-grid--${cardCount}`]: true,
  });

  return (
    <div {...useBlockProps.save()}>
      <div {...useInnerBlocksProps.save({ className })} />
    </div>
  );
}
