import React from 'react';
import { Form } from 'react-bootstrap';
import TextInput from '../TextInput';

function TextInputWithLabel({
    label,
    name,
    value, // state
    type,
    onChange,
    placeholder,
}) {
    return (
        <Form.Group className="form-group w-100">
            <Form.Label>{label}</Form.Label>
            <input
                className="rounded"
                type={type}
                name={name}
                placeholder={placeholder}
                value={value}
                onChange={onChange
                }
                required
            />
        </Form.Group>
    );
}

export default TextInputWithLabel;