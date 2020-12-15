import React from 'react';
import '../../../sass/style_mini_components/ani-select.scss';

class AnimationSelect extends React.Component{
    constructor(props){
        super(props);
        this.state={
            selectedValue: ''
        }
        this.getOptions = this.getOptions.bind(this);
        this.handleInput = this.handleInput.bind(this);
        this.handleSelection = this.handleSelection.bind(this);
    }

    componentDidMount(){
        this.showDropdownSelection = this.showDropdownSelection.bind(this);
    }


    getOptions(element, name){
        return(
                <div key={element} className='option'>
                    <input type='radio' name={name} id={element} value={element} onClick={this.handleSelection} autoComplete='off'></input>
                    <label htmlFor={element}>{element}</label>
                </div>
            )
    }

    showDropdownSelection(event){
        let targetId = event.target.id;
        targetId = targetId.replace('-selected','');
        const selectBoxOptionsContainer = document.querySelector('#'+targetId);
        if(event.type === 'blur'){
             // set a timeout for delaying the disappearing of dropdown meum, in order to capture the handleSelection event
            setTimeout(() => {
                selectBoxOptionsContainer.classList.toggle('active');
            }, 200);
        }else{
            selectBoxOptionsContainer.classList.toggle('active');
        }

    }

    handleInput(event){
        this.setState({selectedValue: event.target.value})
    }

    handleSelection(event){
        this.setState({selectedValue: event.target.value});
    }

    render(){
        return(
           <div className='select-box'>
               <div className='select-box-container'>
                   <div className='select-box-options-container' id={this.props.id}>
                        {this.props.options.map(option => this.getOptions(option, this.props.name))}
                   </div>
                   <div className='selected-option'>
                       <input id={this.props.id + '-selected'} className={this.props.id} type='text' value={this.state.selectedValue} name={this.props.label} onFocus={this.showDropdownSelection} onChange={this.handleInput} onBlur={this.showDropdownSelection} autoComplete='off'></input>
                       <label htmlFor={this.props.id + '-selected'}>
                           <span className='label-content'>{this.props.label}</span>
                        </label>
                       <span className='arrow'></span>
                   </div>
               </div>
           </div>
        );
    }



}


export default AnimationSelect;