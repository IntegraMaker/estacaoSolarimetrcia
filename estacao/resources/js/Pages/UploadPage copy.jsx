import React, {useState} from "react";
import axios from "axios";

const UploadPage = () => {
    const [file,setFile] = useState(null);

    const handleFileChage = (event) => {
        setFile(event.target.files[0]);
    };

    const handleSubmit = async (event) => {
        event.preventDefault();
        const formData = new FormData();
        formData.append('file', file);

        try{

            await axios.post('/upload', formData);
            alert('Arquivo importado com sucesso!');
        } catch (error){
            console.error('Erro ao importar o arquivo',error);
        }
        

    };

    return (
        <div>
            <h2>Upload de Arquivo</h2>
            <form onSubmit={handleSubmit}>
                <input type="file" onChange={handleFileChage} required />
                <button type="submit" >Upload</button>
            </form>
        </div>
    );

};

export default UploadPage;