import clsx from "clsx";

import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function save() {

  const className = clsx({
    "c-block-definition-list": true,
  });

  return (
    <div {...useBlockProps.save()}>
      <dl className={className} {...useInnerBlocksProps.save()} />
    </div>
  );
}
