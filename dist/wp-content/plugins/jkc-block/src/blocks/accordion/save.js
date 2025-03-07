import clsx from "clsx";

import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function save() {

  const className = clsx({
    "c-block-accordion": true,
  });

  return (
    <div {...useBlockProps.save()}>
      <div className={className}>
        <div {...useInnerBlocksProps.save({className: "c-block-accordion__items"})} />
      </div>
    </div>
  );
}
