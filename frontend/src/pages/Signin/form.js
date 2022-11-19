import { Button } from "react-bootstrap";
import { Link, useNavigate } from "react-router-dom";
import GButton from "../../components/GButton";
import TextInputWithLabel from "../../components/TextInputWithLabel";
import { Form } from 'react-bootstrap';


export default function LoginForm({ form, handleChange, handleSubmit, isLoading }) {
    return (
        <Form className="d-flex flex-col justify-content-center align-items-center h-100 w-75 gap-1">
            <TextInputWithLabel placeholder={'Masukan email'}
                label={'Email'}
                name='email'
                value={form?.email}
                type='email'
                onChange={handleChange}
            />
            <TextInputWithLabel
                placeholder={'Masukan password'}
                label={'Password'}
                name='password'
                value={form?.password}
                type='password'
                onChange={handleChange}
            />

            <GButton loading={isLoading}
                disabled={isLoading}
                variant='primary'
                action={handleSubmit}
            >
                Masuk
            </GButton>
        </Form>
    );
};
