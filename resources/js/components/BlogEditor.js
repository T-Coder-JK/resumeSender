import React, {useState, useRef} from 'react';
import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';
import List from '@editorjs/list';
import Quote from '@editorjs/quote';
import Warning from '@editorjs/warning';
import Paragraph from '@editorjs/paragraph';
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


const editor = new EditorJS({
    holder:'editor',
    autofocus: true,
    data:{
        test: 'something for testing'
    },
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



function BlogEditor() {
    const [inputValues, setInputValues] = useState({title: '', theme: '', catergory: '', visibility: ''});
    const inputTitle = useRef(null);
    const inputTheme = useRef(null);
    const inputCatergory = useRef(null);
    const inputVisibility = useRef(null);
    const [blogContent, setBlogContent] = useState();


    function handleSaveData(){
        setInputValues({
            ...inputValues,
            title: inputTitle.current.state.inputValue,
            theme: inputTheme.current.state.selectedValue,
            catergory: inputCatergory.current.state.selectedValue,
            visibility: inputVisibility.current.state.selectedValue,
        });
        editor.save().then((outputData)=>{
            console.log(outputData);
            if(outputData.blocks.length !== 0 ){
                setBlogContent(outputData.blocks);
            }else{
                setBlogContent(undefined);
            }

        })
        .catch((error)=>console.log(error));
    }


    return(
        <div className='editor-page w-100'>
            <div className='editor-header d-flex flex-row border-bottom'>
                <div className='flex-column align-self-start pl-2'>
                    <div className='font-italic h7'>Blog Editor</div>
                    <div className='font-weight-bold h2'>New+</div>
                </div>
                <div className="flex-colum align-self-center ml-auto mr-2">
                    <button type='submit' className='btn btn-outline-info mr-3' onClick= {handleSaveData}>Save</button>
                    <button type='submit' className='btn btn-outline-success mr-3'>Post</button>
                    <button type='submit' className='btn btn-outline-danger mr-3'>Delete</button>
                </div>
            </div>
            <div className='flex-colum'>{Object.keys(inputValues).map((key)=>key+' : '+inputValues[key]+'    ')}</div>
            <div>{blogContent=== undefined?'undefined':Object.keys(blogContent).map((key)=>key+': '+Object.keys(blogContent[key].data).map((key2)=>key2+': '+blogContent[key].data[key2]))}</div>
            <div className='editor-container'>
                <div className='editor-input-container col-10 m-auto'>
                    <div className='section-input d-inline-flex flex-row  align-items-center'>
                        <div className='text-input'>
                            <AnimationInput
                                name='blog-title'
                                type='text'
                                label='Blog Title'
                                ref = {inputTitle}
                            />
                        </div>
                        <div className='text-input'>
                            <AnimationSelect
                                name='theme'
                                id='blog-theme'
                                label='Blog Theme'
                                options={['Algorithm','Database','AWS','Ali-Cloud','Internet','React','Javascript','CSS','Laravel']}
                                ref={inputTheme}
                            />
                        </div>
                        <div className='text-input'>
                            <AnimationSelect
                                name='catergory'
                                id='blog-catergory'
                                label='Catergory'
                                options={['Learning Note','Sharing Technique']}
                                ref={inputCatergory}
                            />
                        </div>
                        <div className='text-input'>
                            <AnimationSelect
                                name='group'
                                label='Visbility'
                                options={['Public','Private']}
                                id='visibility-groups'
                                ref={inputVisibility}
                            />
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
