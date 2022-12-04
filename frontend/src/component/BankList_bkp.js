import { useNavigate } from 'react-router-dom';

const BankList = ({title, banks}) => {

    const navigate = useNavigate();

    return (
        <div className="list">
            <h2>
                {title}
            </h2>
            {banks.map(bank => 
                (
                    <div className="item-list" key={bank.id}>
                        Conta: {bank.id} Nome: {bank.conta} <span>Saldo: {bank.total}</span>
                        <button onClick={() => {
                            navigate('/bank/'+ bank.id +'/release')
                        }} type="button"> Movimentação </button>
                    </div>
                )
            )}
        </div>
    );
}

export default BankList;