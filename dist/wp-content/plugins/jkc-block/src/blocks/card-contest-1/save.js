import clsx from "clsx";
import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function save({ attributes }) {
  const { cardCount } = attributes;
  
  const className = clsx({
    "c-card-contest": true,
    [`c-card-contest--${cardCount}`]: true,
  });

  return (
    <div {...useBlockProps.save()}>
      <div {...useInnerBlocksProps.save({ className })} />
    </div>
  );
}
