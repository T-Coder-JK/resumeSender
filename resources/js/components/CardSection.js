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
            <div>
                <div className='d-flex flex-row border-bottom sticky-top bg-light'>
                    <div className='flex-column align-self-start pl-2'>
                        <div className='font-italic h7'>overview</div>
                        <div className='font-weight-bold h2'>Dashboard</div>
                    </div>
                    <div className='align-self-center ml-auto mr-2'>
                        <a className='p-2 btn btn-success text-white font-weight-bold'
                           href={'application/'+this.props.userId+'/new_job'}>New Application</a>
                    </div>
                </div>
                <div className='data-card-row'>
                    <DashboardCard title='Applied Job' type='application' icon='completed' data={this.state.appliedData}/>
                    <DashboardCard title='Ongoing' type='ongoing' icon='application' data={this.state.ongoingData}/>
                    <DashboardCard title='Reply' type='message' icon='message' />
                    <DashboardCard title='Interview' type='interview' icon='interview' />
                </div>
            </div>
        )
    }

}

export default CardSection;

