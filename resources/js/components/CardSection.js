import React from 'react';
import ReactDom from 'react-dom';
import DashboardCard from './DashboardCard';
import '../../../public/css/component/card_section.css';



function CardSection() {
    return(
        <div className='data-card-row'>
            <DashboardCard title='Applied Job' type='application' icon='completed' />
            <DashboardCard title='Ongoing' type='ongoing-application' icon='application' />
            <DashboardCard title='Reply' type='message' icon='message' />
            <DashboardCard title='Interview' type='interview' icon='interview' />
        </div>
    );
}

if (document.getElementById("card-section")){
    ReactDom.render(<CardSection />, document.getElementById("card-section"));
}

