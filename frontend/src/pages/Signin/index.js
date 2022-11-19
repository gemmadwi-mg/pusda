import React, { useState } from 'react';
import LoginForm from './form';
import { useNavigate } from 'react-router-dom';
import { postData } from '../../utils/fetch';
import { useDispatch } from 'react-redux';
import { userLogin } from '../../redux/auth/actions';


export const PageSignin = () => {
    const dispatch = useDispatch();
    const navigate = useNavigate();
    const [form, setForm] = useState({
        email: '',
        password: '',
    });


    const [isLoading, setIsLoading] = useState(false);

    const handleChange = (e) => {
        setForm({ ...form, [e.target.name]: e.target.value });
    };

    const handleSubmit = async () => {
        try {
            const res = await postData(`login`, form);
            dispatch(
                userLogin(
                    res.data.data.token,
                    res.data.data.role,
                    res.data.data.refreshToken
                )
            );
            
            navigate('/');
        } catch (err) {
            setIsLoading(false);
        }
    };

    return (
        <div className="home d-flex flex-row justify-content-center align-items-center">
            {/* pict */}
            <div className="hero-picture">
                <div className="bg-cyanblue">
                    <img src="/coverimg.png" alt="home cover" />
                </div>
            </div>

            {/* form */}
            <div className="d-flex flex-col justify-content-center align-items-center w-100">
                <img className="hero-logo" src="/logo.png" alt="logo" />
                <h2 className="font-semibold">Selamat Datang!</h2>
                <p>Masuk dengan akun milikmu yang sudah terdaftar.</p>
                <LoginForm form={form}
                    handleChange={handleChange}
                    isLoading={isLoading}
                    handleSubmit={handleSubmit} />
            </div>
        </div>
    )
}

export default PageSignin;