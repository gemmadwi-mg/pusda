import React from 'react';
import { Button } from 'react-bootstrap';
import { Link, useNavigate } from "react-router-dom";

function GButton({
    children,
    action,
    variant,
    size,
    loading,
    disabled,
    className,
}) {
    return (
        <Button
            className="rounded bg-cyanblue text-light form-btn mt-2 font-semibold text-center"
            onClick={action}
        // loading={isLoading}
        >
            {children}
        </Button>
        // <>
        //     <div className="form-group submit-btn w-100 gap-2">

        //         <Link to="/lupa-password" className="rounded text-cyanblue form-btn bg-none font-semibold text-center">
        //             Forgot Password?
        //         </Link>
        //     </div>
        // </>
    );
}

export default GButton;