import React from 'react';
import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';
import List from '@editorjs/list';
import Quote from '@editorjs/quote';
import Warning from '@editorjs/warning';
import Paragraph from 'editorjs-paragraph-with-alignment';
import Checklist from  '@editorjs/checklist';
import Attaches from '@editorjs/attaches';
import Embed from '@editorjs/embed';
import CodeTool from '@editorjs/code';
import ImageTool from '@editorjs/image';
import TableTool from '@editorjs/table';
import InlineCode from '@editorjs/inline-code';
import Marker from '@editorjs/marker';
import '../../../public/css/component/blog_editor.css';
import AnimationInput from './style_mini_components/AnimationInput';
import AnimationSelect from './style_mini_components/AnimationSelect';

function BlogEditor() {

    //EditorJS initiate and set it's plugins
    const editor = new EditorJS({
        holder:'editor',
        autofocus: true,
        tools: {
            header: Header,
            list: List,
            quote: {
                class: Quote,
                inlineToolbar: true,
                config: {
                    quotePlaceholder: 'Enter a quote'
                }
            },
            warning: {
                class: Warning,
                inlineToolbar: true,
                config: {
                    titlePlaceholder: 'Title',
                    messagePlaceholder: 'Message'
                }
            },
            paragraph: {
                class: Paragraph,
                inlineToolbar: true
            },
            checklist: {
                class: Checklist,
                inlineToolbar: true
            },
            attaches: {
                class: Attaches,
                config:{
                    //TODO add the attached file storage address
                    endpoint: ''
                }
            },
            //TODO the embed function doesn't work now
            embed: {
                class: Embed,
                inlineToolbar: true,
                service: {
                    //TODO can add more available services as demand
                    youtube: true,
                    codepen: true
                }
            },
            code: {
                class: CodeTool,
                placeholder: 'Typing code here'
            },
            image: {
                class: ImageTool,
                config: {
                    endpoint: {
                        //TODO add the image storage address
                        byFile: '',
                        byUrl: ''
                    }
                }
            },
            table: {
                class: TableTool,
                inlineToolbar: true,
                config: {
                    row: 2,
                    cols: 3,
                }
            },
            inlineCode: InlineCode,
            marker: Marker,

        }
    });
    return(
        <div className='editor-page w-100'>
            <div className='editor-header d-flex flex-row border-bottom sticky-top'>
                <div className='flex-column align-self-start pl-2'>
                    <div className='font-italic h7'>Blog Editor</div>
                    <div className='font-weight-bold h2'>New+</div>
                </div>
            </div>
            <div className='editor-bg'>
                <div className='input-editor col-10 m-auto'>
                    <div className='section-input d-inline-flex flex-row  align-items-center'>
                        <div className='text-input'>
                            <AnimationInput name='blog-title' type='text' label='Blog Title'/>
                        </div>
                        <div className='text-input'>
                            <AnimationSelect name='theme' id='blog-theme' label='Blog Theme' options={['Algorithm','Database','AWS','Ali-Cloud','Internet','React','Javascript','CSS','Laravel']}/>
                        </div>
                        <div className='text-input'>
                            <AnimationSelect name='catergory' id='blog-catergory' label='Catergory' options={['Learning Note','Sharing Technique']}/>
                        </div>
                        <div className='text-input'>
                            <AnimationSelect name='group' label='Visbility' options={['Public','Private']} id='visibility-groups'/>
                        </div>
                    </div>
                    <div className='editor-pad w-100 bg-light'>
                        <div id='editor'></div>
                    </div>
                </div>
            </div>
        </div>
    );
}


export default BlogEditor;
