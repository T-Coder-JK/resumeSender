import React from 'react';
import ReactDOM from 'react-dom';
// import $ from 'jquery';
/**
 *  Summernote is a WYSIWYG editor component
 *  Which dependents on jQuery and Bootstrap CSS
 */
import 'summernote';

class HtmlEditor extends React.Component{
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
                        <button className="btn-primary p-2 w-25 rounded">Save</button>
                    </div>
                </div>
            </div>
        )
    }
}

ReactDOM.render(<HtmlEditor/>, document.getElementById('htmlEditor'));

