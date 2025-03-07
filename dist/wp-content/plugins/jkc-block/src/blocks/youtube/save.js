import clsx from "clsx"; // クラス名を動的に結合するためのライブラリ

import { __ } from "@wordpress/i18n";
import { useBlockProps, RichText } from "@wordpress/block-editor";

export default function save({ attributes }) {
  const { youtubeId } = attributes;

  return (
    <div {...useBlockProps.save()}>
      <a
        href={`https://www.youtube.com/watch?v=${youtubeId}`}
        className="c-block-youtube"
        data-lity="data-lity"
      >
        <div className="c-block-youtube__img-wrapper">
          <img
            src={`https://i.ytimg.com/vi/${youtubeId}/hqdefault.jpg`}
            alt=""
          />
        </div>
      </a>
    </div>
  );
}
