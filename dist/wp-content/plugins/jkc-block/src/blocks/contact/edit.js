import clsx from "clsx";

import {
  RichText, // リッチテキストエディタコンポーネント
  useBlockProps,
} from "@wordpress/block-editor";
import "./editor.scss"; // エディター用スタイルシートのインポート

export default function ({ attributes, setAttributes }) {
  // 属性の分割代入
  const { organization, number } = attributes;

  // ブロックのプロパティを設定
  const blockProps = useBlockProps();

  // コンテンツが変更されたときの処理
  const onChangeTitle = (newOrganization) => {
    setAttributes({ organization: newOrganization });
  };

  // コンテンツが変更されたときの処理
  const onChangeNumber = (newNumber) => {
    setAttributes({ number: newNumber });
  };

  return (
    <div {...blockProps}>
      <div className="c-block-contact">
        <RichText
          tagName="p"
          className="c-block-contact__organization"
          onChange={onChangeTitle}
          value={organization}
          allowedFormats={[]}
          placeholder="お問い合わせ先を入力"
        />
        <RichText
          tagName="p"
          className="c-block-contact__number"
          onChange={onChangeNumber}
          value={number}
          allowedFormats={[]}
          placeholder="電話番号を入力"
        />
      </div>
    </div>
  );
}
