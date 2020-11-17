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

function BlogEditor() {
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
        <div className='editor_container w-100 h-100 bg-primary'>
            <div>
                <input name='tag' className='input-group-text' type='text'></input>
                <input name='classify' className='input-group-text' type='text'></input>
            </div>
            <div className='col-9 m-auto bg-primary vh-100 w-100 pt-5 pb-5'>
                <div className='w-100 h-100 bg-light'>
                    <div id='editor'></div>
                </div>
            </div>
        </div>
    );
}


export default BlogEditor;
