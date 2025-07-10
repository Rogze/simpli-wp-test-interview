import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, InspectorControls, PanelColorSettings } from '@wordpress/block-editor';
import { PanelBody } from '@wordpress/components';


export default function Edit({ attributes, setAttributes }) {
    const { content, backgroundColor, borderColor } = attributes;

    return (
        <>
            <InspectorControls>
                <PanelColorSettings
                    title={__('Block Colors')}
                    initialOpen={true}
                    colorSettings={[
                        {
                            value: backgroundColor,
                            onChange: (color) => setAttributes({ backgroundColor: color }),
                            label: __('Background color'),
                        },
                        {
                            value: borderColor,
                            onChange: (color) => setAttributes({ borderColor: color }),
                            label: __('Border color'),
                        },
                    ]}
                />
            </InspectorControls>
            <div
                {...useBlockProps({
                    style: {
                        backgroundColor: backgroundColor,
                        border: `2px solid ${borderColor}`,
                        padding: '1rem',
                        cursor: 'pointer',
                    },
                })}
            >
                <RichText
                    tagName="p"
                    value={content}
                    onChange={(val) => setAttributes({ content: val })}
                    placeholder={__('Hello World')}
                />
            </div>
        </>
    );
}
