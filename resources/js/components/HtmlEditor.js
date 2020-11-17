import React from 'react';
import ReactDOM from 'react-dom';
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

/**
 *  Summernote is a WYSIWYG editor component
 *  Which dependents on jQuery and Bootstrap CSS
 */
import 'summernote';

class HtmlEditor extends React.Component{

    constructor(props){
        super(props);
        this.handleSaveClick = this.handleSaveClick.bind(this);

    }

    componentDidMount(){
       this.initSummernote();
    }

    initSummernote(){
        const editor = $(this.refs.summernote);
        editor.summernote({
            airMode: true,
            tabsize: 2,
            height: 'auto',
            focus: true,
            popover:{
                air: [
                    ['font',['bold', 'underline', 'clear']],
                    ['fontname',['fontname']],
                    ['color',['color']],
                    ['view', ['codeview']]
                ]
            }


        });
        editor.summernote('code',document.getElementById('htmlEditor').getAttribute('data-content'));
        editor.summernote('disable');

    }

    handleSaveClick(){
        let templateId = document.getElementById('htmlEditor').getAttribute('data-id');
        let templateContent = $('#summernote').summernote('code');
        axios({
            method: 'patch',
            url: '/emailTemplates/'+templateId+'/update',
            data: {
                templateContent: templateContent
            },

        })
            .then(response => {
                toast.success('Saved', {
                    position: toast.POSITION.BOTTOM_CENTER
                });
            })
            .catch(error => {
                console.log(error)
            })



    }


    render(){
        return(
            <div className="row">
                <div className="col-12">
                    <div className="row-cols-12">
                        <div id="summernote" ref="summernote">
                        </div>
                    </div>
                    <div className="row justify-content-center mt-2">
                        <button id="edit" className="btn-primary mr-5 p-2 w-25 rounded" onClick={function () {
                            let edit = $('#edit');
                            let noteEditor = $('.note-editor');
                            const editor =$('#summernote');
                            if(edit.text() === 'Edit'){
                                noteEditor.css('border', '2px solid #00000032');
                                editor.summernote('enable');
                                edit.text('Finish');
                            }else {
                                editor.summernote('disable');
                                noteEditor.css('border', '0');
                                edit.text('Edit');
                            }

                        }}>Edit</button>
                        <button className="btn-primary p-2 w-25 rounded" onClick={this.handleSaveClick}>Save</button>
                    </div>
                </div>
            </div>
        )
    }
}

if (document.getElementById('htmlEditor')) {
    toast.configure();
    ReactDOM.render(<HtmlEditor/>, document.getElementById('htmlEditor'));
}


