import React from 'react';


function DashboardCard (props){
    return(
        <div className={'data-card data-card-'+ props.type}>
            <a className='text-white card-link' href={'/view/'+props.type}>
            <Header icon={props.icon} title={props.title}/>
            {(()=>{
                switch (props.type){
                    case 'application': return<ApplicationCard date={props.data? props.data.date : 'loading'} num={props.data? props.data.num : 'loading'}/>;
                    case 'ongoing': return<OngoingCard date={props.data? props.data.date: 'loading'} num={props.data? props.data.num: 'loading'}/>;
                    case 'message': return<ReplyMessage/>;
                    case 'interview': return<Interview/>;
                    default: return null;
                }
            })()}
            </a>
        </div>
    );
}


const Header = ({icon, title}) =>(
    <div className='data-card-header align-items-center'>
        <span className='card-header-icon'>
            <img src={'/images/SVG/dashboard/card_'+icon+'.svg'}/>
        </span>
        <span className='card-header-title'>
            {title}
        </span>
    </div>
    );


const ApplicationCard = (props)=>(
    <div className='applied-content'>
        <div className='applied-num'>
            <p>{props.num}</p>
        </div>
        <div className="last-time">
            <span>Latest: {props.date}</span>
        </div>
    </div>
);

const OngoingCard = (props)=>(
    <div>
        <div className='applied-num'>
            <p>{props.num}</p>
        </div>
        <div className="last-time">
            <span>Latest Modified:  {props.date}</span>
        </div>
    </div>
);

const ReplyMessage = ()=>(
    <div>
        <div className='applied-num'>
            <p>0</p>
        </div>
        <div className="last-time">
            <span>Latest:  March 10th 2020</span>
        </div>
    </div>
);

const Interview = ()=>(
    <div>
        <div className='applied-num'>
            <p>1</p>
        </div>
        <div className="last-time">
            <span>Next:  March 10th 2020</span>
        </div>
    </div>
);


export default DashboardCard;
