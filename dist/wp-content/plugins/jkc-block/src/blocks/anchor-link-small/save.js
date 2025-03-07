import clsx from "clsx";

import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function save() {

  const className = clsx({
    "c-block-anchor-link-small": true,
  });

  return (
    <div {...useBlockProps.save()}>
      <div className={className}>
        <ul {...useInnerBlocksProps.save({className: "c-block-anchor-link-small__items"})} />
      </div>
    </div>
  );
}
