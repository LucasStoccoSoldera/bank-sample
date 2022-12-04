import { useNavigate } from 'react-router-dom';

const BankReleaseList = ({title, releases}) => {

    const navigate = useNavigate();

    return (
        <div className="list">
            <h4>
                {title}
                <button onClick={() => {
                            navigate('/bank')
                        }} type="button"> Voltar </button>
            </h4>
            {releases.map(release => 
                (
                    <div className="item-list">
                        Tipo: {release.movimento}
                        Valor: {release.valor}
                    </div>
                )
            )}
        </div>
    );
}

export default BankReleaseList;