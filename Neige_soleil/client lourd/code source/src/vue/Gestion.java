package vue;

import java.awt.Color;

import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JLabel;

public class Gestion extends JFrame {
	public VueProfil uneVueProfil = new VueProfil();
	public Gestion () {
		this.setTitle("Neige & Soleil");
		this.setBounds(200, 200, 500, 300);
		this.setLayout(null);
		this.setResizable(false);
		this.add(this.uneVueProfil);
		ImageIcon image = new ImageIcon("src/images/ski.jpg");
		JLabel titre = new JLabel (image);
		titre.setBounds(-70,0,700,500);
		this.add(titre);
		ImageIcon logo = new ImageIcon("src/images/icone.png");
		this.setIconImage(logo.getImage());
		this.getContentPane().setBackground(new Color(106,168,213));
		this.setVisible(true);
	}
	
	
}
