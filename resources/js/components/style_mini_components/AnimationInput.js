import React from 'react';
import '../../../../public/css/component/ani_input.css';



class AnimationInput extends React.Component{
    constructor(props){
        super(props);
        this.state = {
            inputValue:''
        }
    }
    render(){
        return(
            <div className='ani-input-container'>
                <input id={this.props.id} className={'ani-input-'+this.props.type} name={this.props.name} type={this.props.type} autoComplete='off' value={this.state.inputValue}
                       onChange={(event)=>{
                           this.setState({inputValue: event.target.value});
                       }}></input>
                <label htmlFor={this.props.id} className='label-name'>
                    <span className='label-content'>{this.props.label}</span>
                </label>
            </div>
        );
    }
}





export default AnimationInput;
