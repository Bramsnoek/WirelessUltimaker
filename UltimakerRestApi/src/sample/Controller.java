package sample;

import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.stage.FileChooser;
import javafx.stage.Stage;

import javax.swing.text.View;
import java.awt.event.ActionEvent;
import java.io.File;
import java.net.URL;
import java.util.ResourceBundle;

public class Controller implements Initializable
{
    @FXML
    Button btn_selectfile;

    @FXML
    TextField tb_file;

    @FXML
    TextField tb_user;

    @FXML
    TextField tb_pass;

    private File selectedFile;

    @Override
    public void initialize(URL url, ResourceBundle resourceBundle)
    {
        Image openFolderImage = new Image(getClass().getResourceAsStream("/Icons/folder.png"));
        btn_selectfile.setGraphic(new ImageView(openFolderImage));
        tb_file.setDisable(true);
    }

    @FXML
    public void btn_sendfile_click(javafx.event.ActionEvent v) {
        if(selectedFile == null){
            showAlert(Alert.AlertType.INFORMATION, "Warning", "No file selected", "Please select a file to send to the ultimaker!");
            return;
        }
        else if(tb_user.getText().equals("")){
            showAlert(Alert.AlertType.INFORMATION, "Warning", "No username filled in", "Please fill in a username!");
            return;
        }
        else if(tb_pass.getText().equals("")){
            showAlert(Alert.AlertType.INFORMATION, "Warning", "No password filled in", "Please fill in a password!");
            return;
        }

        ApiPoster poster = new ApiPoster(tb_user.getText(), tb_pass.getText());
        poster.post(selectedFile);
    }

    @FXML
    public void btn_selectfile_click(javafx.event.ActionEvent v) {
        FileChooser fileChooser = new FileChooser();
        fileChooser.setTitle("Select the GCode file you want to print!");
        fileChooser.getExtensionFilters().add(new FileChooser.ExtensionFilter("GCode Files", "*.gcode"));
        File selectedFile = fileChooser.showOpenDialog(new Stage());

        if(selectedFile != null){
            this.selectedFile = selectedFile;
            tb_file.setText(selectedFile.getPath());
        }
    }

    private void showAlert(Alert.AlertType type, String title, String headertext, String contentext){
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(headertext);
        alert.setContentText(contentext);
        alert.show();
    }
}
