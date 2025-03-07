import clsx from "clsx";

import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function save() {

  const className = clsx({
    "c-block-button": true,
  });

  return (
    <div {...useBlockProps.save()}>
      <div className={className}>
        <ul {...useInnerBlocksProps.save({className: "c-block-button__items"})} />
      </div>
    </div>
  );
}
