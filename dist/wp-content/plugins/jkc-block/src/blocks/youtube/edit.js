import { TextControl, PanelBody } from "@wordpress/components";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
  const { youtubeId } = attributes;

  return (
    <>
      <InspectorControls>
        <PanelBody title="YouTube設定">
          <TextControl
            label="Youtube ID"
            value={youtubeId || ""}
            onChange={(value) => setAttributes({ youtubeId: value })}
          />
        </PanelBody>
      </InspectorControls>
      <div {...useBlockProps()}>
        {youtubeId && (
          <div className="c-block-youtube">
            <div className="c-block-youtube__img-wrapper">
              <img
                src={`https://i.ytimg.com/vi/${youtubeId}/hqdefault.jpg`}
                alt=""
              />
            </div>
          </div>
        )}
      </div>
    </>
  );
}
