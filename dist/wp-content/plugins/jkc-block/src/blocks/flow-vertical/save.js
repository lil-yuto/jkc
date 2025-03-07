import clsx from "clsx";
import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function save() {
  
  const className = clsx({
    "c-block-flow-vertical": true,
  });

  return (
    <div {...useBlockProps.save()}>
      <ul {...useInnerBlocksProps.save({ className })} />
    </div>
  );
}
