package com.example.det3_ds;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;

public class SignUpController {
    @FXML
    private TextField txtName;
    @FXML
    private TextField txtUsername;
    @FXML
    private TextField txtEmail;
    @FXML
    private PasswordField pwdPassword;

    @FXML
    private void signupbtnClick (ActionEvent e){
        String name=this.txtName.getText();
        String username=this.txtUsername.getText();
        String email=this.txtEmail.getText();
        String password=this.pwdPassword.getText();
    }
}
