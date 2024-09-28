import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { Bar } from 'react-chartjs-2';
import { Label } from '@headlessui/react';

const Datapage = () => {
    const [dados, setData] = useState([]);
    const [dataInicio, setDataInicio] = useState('');
    const [dataFinal, setDataFinal] = useState('');

    const fetchDaata  = async() => {
        const response = await axios.get(`/dados?dataInicio =${dataInicio}&dataFinal =${dataFinal}`);
        setData(response);

    };

    useEffect(() => {
        fetchDaata();
    }, [dataInicio, dataFinal]);

    const charData = {
        Labels: dados.map(item => item.field1),
        datasets: [
            {
                label: 'Dados',
                data: dados.map(item => item.field2),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
            },
        ],
    };

    return (
        <div>
            <h2>Dados</h2>
            <input type="date" onChange={e=>setDataInicio(e.target.value)} />
            <input type="date" onChange={e=>setDataFinal(e.target.value)} />
            <Bar data={charData} />
        </div>
    )

};

export default Datapage;