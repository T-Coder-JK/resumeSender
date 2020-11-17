import React from 'react';
import DashboardCard from './DashboardCard';
import '../../../public/css/component/card_section.css';
import axios from 'axios';



class CardSection extends React.Component{


    constructor(props) {
        super(props);
        this.state = {
            appliedData: null,
            ongoingData: null
        }
    }
    componentDidMount(){
        if(!this.state.cardData){
            axios({
                method: 'get',
                url: '/dashboard/getApplicationInfo',
            })
                .then(response=>{
                    this.setState({
                        appliedData:response.data.applied,
                        ongoingData:response.data.ongoing
                    });
                })
                .catch(error=>{
                    console.log(error)
                });
        }
    }
    render(){
        return(
        <div className='data-card-row'>
            <DashboardCard title='Applied Job' type='application' icon='completed' data={this.state.appliedData}/>
            <DashboardCard title='Ongoing' type='ongoing' icon='application' data={this.state.ongoingData}/>
            <DashboardCard title='Reply' type='message' icon='message' />
            <DashboardCard title='Interview' type='interview' icon='interview' />
        </div>
        )
    }

}

export default CardSection;

