import React from 'react';


function DashboardCard (prop){
    return(
        <div className={'data-card data-card-'+ prop.type}>
            <Header icon={prop.icon} title={prop.title}/>
            {(()=>{
                switch (prop.type){
                    case 'application': return<ApplicationCard/>;
                    case 'ongoing-application': return<OngoingCard/>;
                    case 'message': return<ReplyMessage/>;
                    case 'interview': return<Interview/>;
                    default: return null;
                }
            })()}
        </div>
    );
}


const Header = ({icon, title}) =>(
    <div className='card-header'>
        <span className='card-header-icon'>
            {icon}
        </span>
        <span className='card-header-title'>
            {title}
        </span>
    </div>
    );


const ApplicationCard = ()=>(
    <div>
        applicaition
    </div>
);
export default DashboardCard;
