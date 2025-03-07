import clsx from "clsx";
import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function save({ attributes }) {
  const { itemCount } = attributes;
  
  const className = clsx({
    "c-contest": true,
    [`c-contest--${itemCount}`]: true,
  });

  return (
    <div {...useBlockProps.save()}>
      <div {...useInnerBlocksProps.save({ className })} />
    </div>
  );
}
