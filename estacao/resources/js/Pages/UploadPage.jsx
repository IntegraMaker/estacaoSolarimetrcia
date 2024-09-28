import React, {useState} from "react";
import { useForm } from "@inertiajs/react";



const UploadPage = () => {


    const { data, setData, post, errors } = useForm ({
        file:null,
    })


    const handleFileChage = (event) => {
        setData('file', event.target.files[0]);
    };

    const handleSubmit = (event) => {
        event.preventDefault();
        post('/upload', {
            forceFormData: true,
        });

    };

    return (
        <div>
            <h2>Upload de Arquivo</h2>
            <form onSubmit={handleSubmit}>
                <input type="file" onChange={handleFileChage} required />
                {errors.file && <div>{errors.file}</div>}
                <button type="submit" >Upload</button>
            </form>
        </div>
    );

};

export default UploadPage;