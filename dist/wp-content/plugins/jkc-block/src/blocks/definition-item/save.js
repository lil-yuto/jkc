import clsx from "clsx";

import {
  RichText,
  useInnerBlocksProps,
} from "@wordpress/block-editor";
import { Fragment } from "@wordpress/element";

export default function ({ attributes }) {
  const { term } = attributes;

  return (
    // 不要なdiv要素をつけないように、save.jsではFragmentで囲む
    <Fragment>
      <RichText.Content
        tagName="dt"
        className="c-block-definition-list__term"
        value={term}
      />
      <dd
        {...useInnerBlocksProps.save({
          className: "c-block-definition-list__description",
        })}
      />
    </Fragment>
  );
}
