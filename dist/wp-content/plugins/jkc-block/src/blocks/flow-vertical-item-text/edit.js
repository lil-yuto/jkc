import {
  RichText, // リッチテキストエディタコンポーネント
  useBlockProps,
} from "@wordpress/block-editor";
import "./editor.scss"; // エディター用スタイルシートのインポート

export default function ({ attributes, setAttributes }) {
  // 属性の分割代入
  const {
    content,
    title,
    placeholder,
  } = attributes;

  // ブロックのプロパティを設定
  const blockProps = useBlockProps();

  const onChangeContent = (newContent) => {
    setAttributes({ content: newContent });
  };

  const onChangeTitle = (newTitle) => {
    setAttributes({ title: newTitle });
  };

  return (
    <>
      <li {...blockProps}>
        <div className="c-block-flow-vertical-item">
          <div className="c-block-flow-vertical-item__body">
            <RichText
              tagName="h4"
              className="c-block-flow-vertical-item__title"
              onChange={onChangeTitle}
              value={title}
              allowedFormats={[]}
              placeholder="タイトルを入力"
              />
            <RichText
              tagName="p"
              className="c-block-flow-vertical-item__description"
              onChange={onChangeContent}
              value={content}
              allowedFormats={["core/italic", "core/bold", "core/text-color"]}
              placeholder={placeholder}
            />
          </div>
        </div>
      </li>
    </>
  );
}
